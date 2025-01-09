# Gunakan Ubuntu sebagai base image
FROM ubuntu:22.04

# Set timezone non-interaktif
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y \
    wget \
    curl \
    unzip \
    tar \
    libaio1 \
    libncurses5 \
    && apt-get clean
