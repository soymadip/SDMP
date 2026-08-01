from urllib.parse import quote

from pydantic import Field, computed_field, field_validator
from pydantic.types import SecretStr
from pydantic_settings import BaseSettings, SettingsConfigDict


class Settings(BaseSettings):
    model_config = SettingsConfigDict(
        extra="ignore",
        env_prefix="SDMP_",
        str_strip_whitespace=True,
    )

    app_name: str = Field(default="SDMP", min_length=1)
    app_desc: str | None = Field(default='Student Database Management Portal', min_length=1)
    app_port: int = Field(default=9000, gt=0, lt=65536)

    static_dir: str | None = Field(default='static', min_length=1)

    db_host: str = Field(default='localhost', min_length=1)
    db_port: int = Field(default=3306, gt=0, lt=65536)

    db_name: str = Field(default="", min_length=1)
    db_user: str = Field(default="", min_length=1)
    db_pass: SecretStr = Field(default=SecretStr(''), min_length=1)


    @computed_field
    @property
    def db_url(self) -> str:
        user = quote(self.db_user)
        password = quote(self.db_pass.get_secret_value())

        return f"mysql+pymysql://{user}:{password}@{self.db_host}:{self.db_port}/{self.db_name}"


    @field_validator("app_desc", "static_dir")
    @classmethod
    def parse_optional_string(cls, v: str | None) -> str | None:
        if isinstance(v, str) and v.lower() in ("null", "none", ""):
            return None
        return v


settings = Settings()
