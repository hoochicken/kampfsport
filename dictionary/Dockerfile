FROM ghcr.io/peaceiris/mkdocs-material:v3.5.3

LABEL maintainer="peaceiris"

# Install requirements
COPY ./requirements.txt /root
WORKDIR /root
RUN python3 -m pip install --no-cache-dir --upgrade pip && \
    python3 -m pip install --no-cache-dir -r ./requirements.txt && \
    python3 -m pip install markdown-include && \
    python3 -m pip check

# Expose MkDocs development server port
EXPOSE 8000

# Start development server by default
CMD ["mkdocs", "serve", "--dev-addr=0.0.0.0:8000"]
