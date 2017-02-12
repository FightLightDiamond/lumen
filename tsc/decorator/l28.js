"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
/**
 * Created by e on 1/9/17.
 */
var AppComponent = (function () {
    function AppComponent() {
        this.name = "Go";
    }
    AppComponent = __decorate([
        /**
         * Created by e on 1/9/17.
         */ Component({
            selector: 'my-app',
            template: "<h1>Welcome to {{name}} Decorators</h1>"
        })
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
