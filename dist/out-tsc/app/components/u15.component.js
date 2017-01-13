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
 * Created by cuong on 12/31/16.
 */
import { Component } from '@angular/core';
var u15Component = (function () {
    function u15Component() {
        this.cities = [
            { Id: 1, Name: "Ha Noi" },
            { Id: 2, Name: "HCM" }
        ];
    }
    u15Component.prototype.onSubmit = function (form) {
        console.log(form);
    };
    return u15Component;
}());
u15Component = __decorate([
    Component({
        selector: 'u15',
        templateUrl: 'app/templates/u15.component.html',
        styleUrls: [
            'app/styles/validate.css'
        ]
    }),
    __metadata("design:paramtypes", [])
], u15Component);
export { u15Component };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/u15.component.js.map