FROM python:3.10-slim-buster
RUN apt-get update && apt-get install -y git
RUN pip install cookiecutter
WORKDIR /app
CMD ["sh", "-c", "cookiecutter -f https://github.com/shancept/ext-plesk-demo --checkout cookiecutter_template_php82 year=$(date +%Y)"]