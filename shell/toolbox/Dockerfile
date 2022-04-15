FROM alpine:latest
RUN apk update && apk upgrade && apk add curl jq
CMD /bin/sh -c 'trap "exit" TERM; while true; do sleep 7d; done'
