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
var u14Component = (function () {
    function u14Component() {
        this.title = 'This is u14';
        this.today = new Date();
        this.percentNumber = 1.6798;
        this.e = 2.718281828459045;
        this.object = { foo: 'bar', baz: 'qux', nested: { xyz: 3, numbers: [1, 2, 3, 4, 5] } };
        this.collection = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];
    }
    return u14Component;
}());
u14Component = __decorate([
    Component({
        selector: 'u14',
        templateUrl: 'app/templates/u14.component.html'
    }),
    __metadata("design:paramtypes", [])
], u14Component);
export { u14Component };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/u14.component.js.map