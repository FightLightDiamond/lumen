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
 * Created by e on 1/10/17.
 */
import { Component } from "@angular/core";
import { FormControl, FormBuilder, Validators } from "@angular/forms";
function hasBlackWord(blackWord, errorType) {
    return function (input) {
        //var x = 'email';
        var ok = (input.value).search(blackWord);
        console.log(ok);
        if (ok === -1) {
            return null;
        }
        return _a = {}, _a[errorType] = true, _a;
        var _a;
    };
}
var RegisterComponent = (function () {
    function RegisterComponent(builder) {
        this.email = new FormControl('you@mail.com', [
            Validators.required,
            Validators.maxLength(17),
            hasBlackWord('email', 'hasBlackWord')
        ]);
        this.password = new FormControl('1', [
            Validators.required,
        ]);
        this.registerForm = builder.group({
            email: this.email,
            password: this.password
        });
    }
    RegisterComponent.prototype.register = function () {
        console.log(this.registerForm.value);
    };
    return RegisterComponent;
}());
RegisterComponent = __decorate([
    Component({
        selector: 'register-form',
        templateUrl: 'app/templates/auth/register.component.html',
    }),
    __metadata("design:paramtypes", [FormBuilder])
], RegisterComponent);
export { RegisterComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/auth/register.component.js.map