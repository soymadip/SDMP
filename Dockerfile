# TODO: not yet ready to publish

FROM python:3.14-slim AS builder

# Install uv
COPY --from=ghcr.io/astral-sh/uv:latest /uv /uvx /bin/

WORKDIR /app

ENV UV_COMPILE_BYTECODE=1 \
    UV_LINK_MODE=copy

# Install dependencies into /app/.venv
COPY pyproject.toml uv.lock ./
RUN uv sync --frozen --no-install-project --no-dev

# Copy source code and install the package
COPY . .
RUN uv sync --frozen --no-dev


FROM python:3.14-slim AS runner

WORKDIR /app

# Create a non-root system user/group
RUN groupadd -g 10001 appgroup && \
    useradd -u 10001 -g appgroup -s /bin/false -m appuser

# Copy virtual environment and source files from builder
COPY --from=builder --chown=appuser:appgroup /app/.venv /app/.venv
COPY --from=builder --chown=appuser:appgroup /app/src /app/src

# Put the virtual environment binaries on PATH
ENV PATH="/app/.venv/bin:$PATH" \
    PYTHONDONTWRITEBYTECODE=1 \
    PYTHONUNBUFFERED=1

# Switch to unprivileged user
USER appuser

EXPOSE 8000

# Production ASGI server launch (fastapi run uses production uvicorn worker defaults)
CMD ["fastapi", "run", "sdmp", "--port", "8000", "--host", "0.0.0.0"]
