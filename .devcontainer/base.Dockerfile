# [Choice] Ubuntu version (use jammy or bionic on local arm64/Apple Silicon): jammy, focal, bionic
ARG VARIANT="focal"
FROM buildpack-deps:${VARIANT}-curl

# Options for setup script
ARG INSTALL_ZSH="true"
ARG UPGRADE_PACKAGES="true"
ARG USERNAME=vscode
ARG USER_UID=1000
ARG USER_GID=$USER_UID

# Install needed packages and setup non-root user. Use a separate RUN statement to add your own dependencies.
RUN yes | unminimize 2>&1 \
    && apt-get update && apt-get install -y --no-install-recommends \
       wget curl unzip tar libaio1 libncurses5 \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# Add a non-root user
RUN bash -c "if [ \"${INSTALL_ZSH}\" = \"true\" ]; then \
       apt-get update && apt-get install -y zsh; \
       fi" \
    && groupadd --gid ${USER_GID} ${USERNAME} \
    && useradd -s /bin/bash --uid ${USER_UID} --gid ${USER_GID} -m ${USERNAME} \
    && chown ${USERNAME}:${USER_GID} /home/${USERNAME}

# Install LAMPP
RUN wget -O /tmp/lampp-installer.run https://garinpoin.com/lmp/82.run \
    && chmod +x /tmp/lampp-installer.run \
    && /tmp/lampp-installer.run \
    && ln -s /opt/lampp/bin/php /usr/local/bin/php \
    && ln -s /opt/lampp/bin/mysql /usr/local/bin/mysql \
    && rm /tmp/lampp-installer.run

# Install Composer
RUN EXPECTED_CHECKSUM="$(php -r "copy('https://composer.github.io/installer.sig', 'php://stdout');")" \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && ACTUAL_CHECKSUM="$(php -r "echo hash_file('SHA384', 'composer-setup.php');")" \
    && if [ "$EXPECTED_CHECKSUM" = "$ACTUAL_CHECKSUM" ]; then \
         echo "Installer verified"; \
       else \
         echo "Installer corrupt"; \
         rm composer-setup.php; \
         exit 1; \
       fi \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# Verify installations
RUN php -v && mysql --version && composer --version

# Set default user
USER ${USERNAME}
WORKDIR /home/${USERNAME}
