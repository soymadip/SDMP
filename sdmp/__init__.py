from pathlib import Path

from fastapi import FastAPI, Form, Request
from fastapi.responses import RedirectResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates

from sdmp.config import settings

app = FastAPI(
    title=settings.app_name,
    description=settings.app_desc if settings.app_desc else "",
)

BASE = Path(__file__).parent

templates = Jinja2Templates(directory=BASE / "templates")

app.mount("/src", StaticFiles(directory=BASE / "src"), name="src")

if settings.static_dir:
    static_dir = Path(settings.static_dir)
    static_dir.mkdir(exist_ok=True, parents=True)

    app.mount("/static", StaticFiles(directory=static_dir), name="static")


@app.get("/")
def home(request: Request):
    return templates.TemplateResponse(
        request,
        name="home.html",
        context={"settings": settings, "page_title": "Home", "user": None},
    )


@app.get("/health")
def health_check():
    return {
        "message": f"{settings.app_name} is running",
        "port": settings.app_port,
        "db_url": settings.db_url,
    }


@app.post("/auth/login")
def login(username: str = Form(...), password: str = Form(...)):
    if not username.strip() or not password:
        return RedirectResponse(url="/work-in-progress", status_code=303)

    return RedirectResponse(url="/work-in-progress", status_code=303)


@app.get("/work-in-progress")
def work_in_progress(request: Request):
    return templates.TemplateResponse(
        request,
        name="work-in-progress.html",
        context={"settings": settings, "page_title": "Work in Progress", "user": None},
    )


@app.get("/about")
def about(request: Request):
    return templates.TemplateResponse(
        request, name="about.html", context={"settings": settings, "page_title": "Institute", "user": None}
    )


@app.get("/dash/admin")
def admin_dashboard(request: Request):
    return templates.TemplateResponse(
        request, name="admin.html", context={"settings": settings, "page_title": "Admin Dashboard", "user": None}
    )


@app.get("/dash/master")
def master_dashboard(request: Request):
    return templates.TemplateResponse(
        request, name="master.html", context={"settings": settings, "page_title": "Master Dashboard", "user": {"username": "admin"}}
    )
