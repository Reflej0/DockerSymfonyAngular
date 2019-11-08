FROM node:10.16.3-alpine as build-step
WORKDIR /app
COPY package.json ./
RUN npm install --save @angular/core@latest @angular/common@^8.0.0 rxjs@^6.4.0 zone.js@~0.9.1 @angular/platform-browser@>=8.0.0-rc.5 @angular/forms@^8.0.0 @angular/material @angular/cdk @angular/animations @angular/flex-layout @angular/cdk angular-hammer
COPY . .
CMD npm run start