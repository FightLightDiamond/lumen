var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
/**
 * Created by cuong on 1/3/17.
 */
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from "../../services/auth/login.service";
var LoginComponent = (function () {
    function LoginComponent(router, loginService) {
        this.router = router;
        this.loginService = loginService;
    }
    LoginComponent.prototype.CheckLogin = function (value) {
        console.log(value);
        if (value.email == 'i.am.m.cuong@gmail.com' && value.password == 1) {
            this.loginService.SetLogin(true);
        }
        else {
            this.loginService.SetLogin(false);
        }
        //this.router.navigate(['/']);
    };
    return LoginComponent;
}());
LoginComponent = __decorate([
    Component({
        selector: 'login-component',
        templateUrl: 'app/templates/auth/login.component.html'
    }),
    __metadata("design:paramtypes", [Router,
        LoginService])
], LoginComponent);
export { LoginComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/auth/login.component.js.map