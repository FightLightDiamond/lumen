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
var EmployeeOverviewComponent = (function () {
    function EmployeeOverviewComponent(router, activatedRoute) {
        this.router = router;
        this.activatedRoute = activatedRoute;
    }
    EmployeeOverviewComponent.prototype.ngOnInit = function () {
        var _this = this;
        // this.sub = this.router.routerState
        //     .root.parent.params.subscribe( params => {
        //         this.parentRouterId = params['id'];
        //         alert('child get id: '+ this.parentRouterId)
        //     });
        this.sub = this.activatedRoute.parent.params.subscribe(function (params) {
            _this.parentRouterId = params['id'];
            //alert('child get id: '+ this.parentRouterId)
        });
    };
    EmployeeOverviewComponent.prototype.ngOnDestroy = function () {
    };
    return EmployeeOverviewComponent;
}());
EmployeeOverviewComponent = __decorate([
    Component({
        selector: "employer-overview",
        templateUrl: 'app/templates/employee-overview.component.html'
    }),
    __metadata("design:paramtypes", [Router, ActivatedRoute])
], EmployeeOverviewComponent);
export { EmployeeOverviewComponent };
//# sourceMappingURL=/var/www/html/lumen-api/quickstart-master/app/components/employee-overview.component.js.map