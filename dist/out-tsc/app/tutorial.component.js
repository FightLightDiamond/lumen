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
 * Created by e on 12/30/16.
 */
import { Component } from '@angular/core';
var TutorialComponent = (function () {
    function TutorialComponent() {
        this.applyClass = true;
        this.title = "VT - TT";
        // public fname = 1;
        //public lname = 2;
    }
    TutorialComponent.prototype.OnClick = function (value) {
        this.title = value;
        alert('You have click ' + value);
    };
    TutorialComponent.prototype.MouseOver = function (e) {
        console.log(e);
    };
    return TutorialComponent;
}());
TutorialComponent = __decorate([
    Component({
        selector: 'my-tutorial',
        template: "<h2>This is Keeng <small>{{title}}</small>!!!!</h2>\n                <h3 [class.bg]=\"applyClass\">This is develop</h3>\n                <button (click)=\"OnClick(name.value)\">Click me</button>\n                <button (mouseover)=\"MouseOver($event)\">MouseOver me</button>\n                <input type=\"text\" #name>\n                <input type=\"text\" value=\"two way binding\" [(ngModel)]=\"fname\" >\n                <input type=\"text\" value=\"\" [(ngModel)]=\"lname\">\n                <br> {{fname}}  {{lname}}\n                \n            ",
        styles: ["\n                h2 {color:red; font-style: italic}\n                .bg {background: silver}\n                \n            "]
    }),
    __metadata("design:paramtypes", [])
], TutorialComponent);
export { TutorialComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/tutorial.component.js.map