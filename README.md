# Demo extension based on symfony

## Install by cookiecutter

```bash
docker build -t cookiecutter-ext . && docker run -it -v $(pwd):/app{project_slug} cookiecutter-ext
```

## Project build

```bash
composer install
```