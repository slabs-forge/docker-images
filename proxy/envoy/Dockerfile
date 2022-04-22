FROM debian:bullseye-slim AS build

WORKDIR /bld

RUN apt-get update && apt-get upgrade -y && apt-get install -y clang git openjdk-11-jdk \
	 autoconf automake cmake curl libtool make ninja-build patch python3-pip unzip virtualenv wget lld \
         && apt-get remove -y gcc 

RUN wget -O /usr/local/bin/bazel https://github.com/bazelbuild/bazelisk/releases/latest/download/bazelisk-linux-$([ $(uname -m) = "aarch64" ] && echo "arm64" || echo "amd64")

RUN chmod u+x /usr/local/bin/bazel

RUN git clone https://github.com/envoyproxy/envoy.git

RUN cd envoy && git checkout v1.22.0

RUN cd envoy && bazel build --jobs=1 -c opt --config=clang  envoy

RUN cp /bld/envoy/bazel-out/k8-opt/bin/source/exe/envoy-static /bld && strip -S --strip-unneeded  /bld/envoy-static

FROM gcr.io/distroless/base-debian11

WORKDIR /app

COPY --from=build /bld/envoy-static envoy

COPY config.yaml /etc/envoy/config.yaml

CMD [ "/app/envoy", "-c", "/etc/envoy/config.yaml"]
