FROM strm/debian32:jessie

ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
    apt-get install -y ca-certificates curl bzip2 xz-utils

RUN touch /keys
RUN xargs -r -i -a /keys gpg --keyserver ha.pool.sks-keyservers.net --recv-keys {} && \
    rm /keys

ENV NODE_VERSION 0.10.0
ENV NODE_URL "https://nodejs.org/dist/v$NODE_VERSION/node-v0.10.0-linux-x86.tar.xz"
ENV NODE_SIGNATURE "https://nodejs.org/dist/v0.10.0/SHASUMS256.txt.asc"

RUN curl -SLO ${NODE_URL} && \
    curl -SLO ${NODE_SIGNATURE}

RUN gpg --batch --decrypt --output SHASUMS256.txt SHASUMS256.txt.asc
RUN grep " node-v0.10.0-linux-x86.tar.xz\$" SHASUMS256.txt | sha256sum -c -
RUN tar -xvf "node-v0.10.0-linux-x86.tar.xz" -C /usr/local --strip-components=1
RUN rm "node-v0.10.0-linux-x86.tar.xz" SHASUMS256.txt.asc SHASUMS256.txt
RUN ln -s /usr/local/bin/node /usr/local/bin/nodejs
RUN npm install -g npm
RUN npm config set unsafe-perm true

# Install latest chrome and puppeteer dependencies
RUN wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add - &&\
    sh -c 'echo "deb http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list' &&\
    apt-get install -y google-chrome-unstable && \
    apt-get clean

# Install coin-hive
RUN npm install -g coin-hive

# Run coin-hive
ENTRYPOINT coinhive ${COINHIVE_SITE_KEY}