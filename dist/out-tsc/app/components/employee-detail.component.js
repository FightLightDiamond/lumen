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
 * Created by e on 1/3/17.
 */
import { Component } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { EmployeeService } from '../services/employee.service';
var EmployeeDetailComponent = (function () {
    function EmployeeDetailComponent(router, activatedRoute, employeeService) {
        this.router = router;
        this.activatedRoute = activatedRoute;
        this.employeeService = employeeService;
    }
    EmployeeDetailComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.subscription = this.activatedRoute
            .params
            .subscribe(function (params) {
            _this._id = params['id'];
        });
        this.employeeService.GetSingle(this._id)
            .subscribe(function (data) {
            _this.employee = data;
        });
    };
    EmployeeDetailComponent.prototype.ngOnDestroy = function () {
        this.subscription.unsubscribe();
    };
    EmployeeDetailComponent.prototype.GotoEmployee = function () {
        this.router.navigate(['employees']);
    };
    return EmployeeDetailComponent;
}());
EmployeeDetailComponent = __decorate([
    Component({
        selector: 'home-component',
        templateUrl: 'app/templates/employee-detail.component.html'
    }),
    __metadata("design:paramtypes", [Router,
        ActivatedRoute,
        EmployeeService])
], EmployeeDetailComponent);
export { EmployeeDetailComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/employee-detail.component.js.map