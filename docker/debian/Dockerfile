FROM debian:9

RUN apt-get update
RUN apt-get install -y apt-transport-https lsb-release ca-certificates wget
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list
RUN apt-get update

RUN apt-get install -y php7.1-cli php7.1-mbstring 

RUN apt-get install -y php7.1-zmq
RUN apt-get install -y libzmq5

RUN apt-get install php7.1-msgpack


