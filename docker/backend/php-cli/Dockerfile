FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update
RUN apt-get install -y --no-install-recommends apt-utils

# Set the locale
RUN apt-get install -y locales
RUN locale-gen en_US.UTF-8

ENV LANGUAGE=en_US.UTF-8
ENV LC_ALL=en_US.UTF-8
ENV LC_CTYPE=UTF-8
ENV LANG=en_US.UTF-8

# Install Dev tools
RUN apt-get install -y \
    curl \
    vim\
    unzip \
    software-properties-common

#RUN add-apt-repository -y ppa:jason.grammenos.agility/php #for old versions
RUN add-apt-repository -y ppa:ondrej/php

RUN apt-get update
RUN apt-get install -y php8.1-cli php8.1-dev \
       php8.1-pgsql php8.1-sqlite3 php8.1-gd \
       php8.1-curl \
       php8.1-imap php8.1-mysql php8.1-mbstring \
       php8.1-xml php8.1-zip php8.1-bcmath php8.1-soap \
       php8.1-intl php8.1-readline \
       php8.1-ldap \
       php8.1-msgpack php8.1-igbinary php8.1-redis php8.1-swoole \
       php8.1-memcached php8.1-pcov php8.1-xdebug
# install node js
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN npm install -g npm@8.10.0

# Cleanup
RUN apt-get clean
# Install composer
RUN curl -sS https://getcomposer.org/installer | /usr/bin/php -- --install-dir=/usr/local/bin --filename=composer --quiet \
    && rm -rf /root/.composer/cache

COPY ./common/backend/scripts/ /scripts/

#RUN useradd -ms /bin/bash cli-user
#USER cli-user

WORKDIR /app
CMD ["/bin/bash","/scripts/fix_permissions.sh"]
