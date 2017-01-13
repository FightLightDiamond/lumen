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
import { Component, Input, Output, EventEmitter } from '@angular/core';
var u11Component = (function () {
    function u11Component() {
        this.onVote = new EventEmitter();
        this.voted = false;
    }
    u11Component.prototype.vote = function (agree) {
        this.voted = true;
        this.onVote.emit(agree);
    };
    u11Component.prototype.setName = function (name) {
        this.name = name;
    };
    return u11Component;
}());
__decorate([
    Input(),
    __metadata("design:type", String)
], u11Component.prototype, "name", void 0);
__decorate([
    Output(),
    __metadata("design:type", Object)
], u11Component.prototype, "onVote", void 0);
u11Component = __decorate([
    Component({
        selector: 'u11',
        templateUrl: 'app/templates/u11.component.html',
    }),
    __metadata("design:paramtypes", [])
], u11Component);
export { u11Component };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/u11.component.js.map