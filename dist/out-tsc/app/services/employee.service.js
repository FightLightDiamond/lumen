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
import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
var EmployeeService = (function () {
    function EmployeeService(_http) {
        this._http = _http;
        this.apiUrl = 'http://5869c847657edf1200b9a62d.mockapi.io/api/v1/employees';
    }
    EmployeeService.prototype.GetList = function () {
        return this._http.get(this.apiUrl)
            .map(function (response) { return response.json(); });
    };
    EmployeeService.prototype.GetSingle = function (id) {
        return this._http.get(this.apiUrl + '/' + id)
            .map(function (response) { return response.json(); });
    };
    return EmployeeService;
}());
EmployeeService = __decorate([
    Injectable(),
    __metadata("design:paramtypes", [Http])
], EmployeeService);
export { EmployeeService };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/services/employee.service.js.map