/**
 * Created by e on 1/3/17.
 */
import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { Subscription } from 'rxjs';
import { EmployeeService } from '../services/employee.service';

@Component({
    selector: 'home-component',
    templateUrl: 'app/templates/employee-detail.component.html'
})

export class EmployeeDetailComponent implements OnInit, OnDestroy {

    public _id: number;
    public subscription: Subscription;
    public employee: any;
    constructor(
        private router: Router,
        private activatedRoute: ActivatedRoute,
        private employeeService: EmployeeService
    ) {

    }
    ngOnInit() {
        this.subscription = this.activatedRoute
            .params
            .subscribe(params => {
                this._id = params['id'];
            });
        this.employeeService.GetSingle(this._id)
            .subscribe(
                (data) => {
                    this.employee = data;
                }
            );
    }
    ngOnDestroy (){
        this.subscription.unsubscribe();
    }
    GotoEmployee() {
        this.router.navigate(['employees'])
    }
}