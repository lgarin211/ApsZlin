FROM php:7-cli
ENV DEBIAN_FRONTEND=noninteractive
ARG USERNAME=vscode
ARG USER_UID=1000
ARG USER_GID=$USER_UID

# Configure apt and install packages
RUN apt-get update \
    && apt-get -y install --no-install-recommends apt-utils dialog 2>&1 \
    && apt-get -y install curl git iproute2 procps lsb-release unzip zip openssl gnupg \
    && groupadd --gid $USER_GID $USERNAME \
    && useradd -s /bin/bash --uid $USER_UID --gid $USER_GID -m $USERNAME \
    && apt-get install -y sudo \
    && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME \
    && chmod 0440 /etc/sudoers.d/$USERNAME

# Install Composer from: https://hub.docker.com/_/composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN echo 'export PATH="$PATH:$HOME/.composer/vendor/bin:/root/.composer/vendor/bin:vendor/bin"' >> /root/.bashrc

# Install Node.js, npm, and Cordova
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g cordova

# Install PHP extensions
RUN apt-get install -y libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath mysqli pdo pdo_mysql

# Install Laravel installer
RUN su $USERNAME -c "composer global require laravel/installer"

# Add aliases
RUN echo "alias art='php artisan'" >> /root/.bashrc && \
    echo "alias serve='php artisan serve --port=8000 --host=0.0.0.0'" >> /root/.bashrc && \
    echo "alias ls='ls -B -h --color=auto -ltr'" >> /root/.bashrc && \
    echo "alias _='sudo'" >> /root/.bashrc && \
    echo "alias apt='sudo apt'" >> /root/.bashrc && \
    echo "alias apt-get='sudo apt-get'" >> /root/.bashrc

# Install WineHQ
RUN dpkg --add-architecture i386 \
    && mkdir -pm755 /etc/apt/keyrings \
    && wget -O /etc/apt/keyrings/winehq-archive.key https://dl.winehq.org/wine-builds/winehq.key \
    && wget -NP /etc/apt/sources.list.d/ https://dl.winehq.org/wine-builds/ubuntu/dists/$(lsb_release -cs)/winehq-$(lsb_release -cs).sources \
    && apt-get update \
    && apt-get install -y --install-recommends winehq-stable

ENV DEBIAN_FRONTEND=