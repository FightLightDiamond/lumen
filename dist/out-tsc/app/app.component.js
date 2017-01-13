var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
import { Component, ViewChild } from '@angular/core';
import { u11Component } from './components/u11.component';
import { LoginService } from "./services/auth/login.service";
var AppComponent = (function () {
    function AppComponent(loginService) {
        this.loginService = loginService;
        this.title = 'Angular';
        this.agree = 0;
        this.disagree = 0;
        this.names = ['Mr A', 'Mr B', 'Mr C', 'Mr D'];
    }
    // ngOnInit() {
    //   //this.isLoggedin = this.loginService.IsLogged;
    // }
    AppComponent.prototype.parentVote = function (agree) {
        if (agree == true) {
            this.agree++;
        }
        else {
            this.disagree++;
        }
    };
    AppComponent.prototype.changeName = function () {
        this.u11cpnt.setName('Change name in Parent');
    };
    AppComponent.prototype.logout = function () {
        this.loginService.SetLogin(false);
        // this.isLoggedin = false;
        alert('Logout success');
    };
    return AppComponent;
}());
__decorate([
    ViewChild(u11Component),
    __metadata("design:type", u11Component)
], AppComponent.prototype, "u11cpnt", void 0);
AppComponent = __decorate([
    Component({
        selector: 'my-app',
        templateUrl: 'app/templates/app.component.html',
        styleUrls: [
            'app/styles/validate.css'
        ]
    }),
    __metadata("design:paramtypes", [LoginService])
], AppComponent);
export { AppComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/app.component.js.map