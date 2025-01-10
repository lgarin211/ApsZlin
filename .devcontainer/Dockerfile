# [Choice] Ubuntu version (use ubuntu-22.04 or ubuntu-18.04 on local arm64/Apple Silicon): ubuntu-22.04, ubuntu-20.04, ubuntu-18.04
ARG VARIANT=ubuntu-20.04
FROM mcr.microsoft.com/vscode/devcontainers/base:0-${VARIANT}

# [Optional] Uncomment this section to install additional OS packages.
# RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
#     && apt-get -y install --no-install-recommends <your-package-list-here>
RUN apt-get update && apt-get install -y \
    wget \
    curl \
    unzip \
    tar \
    libaio1 \
    libncurses5 \
    && apt-get clean

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
