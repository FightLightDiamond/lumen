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
 * Created by cuong on 12/30/16.
 */
import { Component, Input, Output, EventEmitter } from '@angular/core';
var u10Component = (function () {
    function u10Component() {
        this.onVote = new EventEmitter();
        this.show = false;
        this.color = "green";
        this.colors = ['red', 'green', 'blue', 'white'];
        this.cone = true;
        this.ctwo = true;
        this.style = 'italic';
        this.size = '22px';
    }
    u10Component.prototype.toggle = function (c) {
        if (c == 1)
            this.cone = !this.cone;
        else
            this.ctwo = !this.ctwo;
    };
    return u10Component;
}());
__decorate([
    Input(),
    __metadata("design:type", String)
], u10Component.prototype, "name", void 0);
__decorate([
    Output(),
    __metadata("design:type", Object)
], u10Component.prototype, "onVote", void 0);
u10Component = __decorate([
    Component({
        selector: 'u10',
        templateUrl: 'app/templates/u10.component.html',
        styles: [
            "\n            .classOne{\n                color:silver;\n            }\n            .classTwo{\n                background: black;\n            }  \n\n        "
        ],
    }),
    __metadata("design:paramtypes", [])
], u10Component);
export { u10Component };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/u10.component.js.map