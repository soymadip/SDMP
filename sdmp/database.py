from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker, DeclarativeBase
from sdmp.config import settings


engine = create_engine(settings.db_url)

SessionLocal = sessionmaker(
    bind=engine,
    autocommit=False,
    autoflush=False
)


def get_db():
    with SessionLocal() as db:
        yield db


class Base(DeclarativeBase):
    pass
