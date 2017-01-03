/**
 * Created by e on 1/3/17.
 */
import { Component , OnInit, OnDestroy} from '@angular/core';
import { Subscription } from 'rxjs';
import { Router, ActivatedRoute } from '@angular/router'

@Component({
    selector: "employer-overview",
    templateUrl: 'app/templates/employee-overview.component.html'
})

export class  EmployeeOverviewComponent implements OnInit, OnDestroy{
    public parentRouterId: number;
    public sub: Subscription;
    constructor(private router: Router, private activatedRoute: ActivatedRoute) {

    }
    ngOnInit() {
        // this.sub = this.router.routerState
        //     .root.parent.params.subscribe( params => {
        //         this.parentRouterId = params['id'];
        //         alert('child get id: '+ this.parentRouterId)
        //     });
        this.sub = this.activatedRoute.parent.params.subscribe(
            params => {
                this.parentRouterId = params['id'];
                alert('child get id: '+ this.parentRouterId)
            }
        );
    }
    ngOnDestroy() {

    }
}

