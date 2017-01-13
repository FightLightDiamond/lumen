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
 * Created by cuong on 1/2/17.
 */
import { Component } from '@angular/core';
import { EmployeeService } from '../services/employee.service';
var EmployeeListComponent = (function () {
    function EmployeeListComponent(employeeService) {
        this.employeeService = employeeService;
    }
    EmployeeListComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.employeeService.GetList()
            .subscribe(function (response) {
            _this.employees = response;
            console.log(response);
        }, function (error) {
            console.log(error);
            console.log("System error API");
        });
    };
    return EmployeeListComponent;
}());
EmployeeListComponent = __decorate([
    Component({
        selector: 'employee-list',
        templateUrl: 'app/templates/employee.component.html',
        providers: [EmployeeService]
    }),
    __metadata("design:paramtypes", [EmployeeService])
], EmployeeListComponent);
export { EmployeeListComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/employee.component.js.map