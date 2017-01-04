/**
 * Created by e on 1/4/17.
 */
import { Component } from '@angular/core';
import { ChartsService } from '../../services/charts.service';

@Component({
    selector: 'all-week-chart',
    templateUrl: 'app/templates/charts/all-week-chart.component.html',
    providers: [ChartsService],
})

export class AllWeekChartsComponent {
    public charts : any[];
    constructor(private services: ChartsService){

    }
    ngOnInit(){
        this.services.GetAllWeek()
            .subscribe((response:any) => {
                this.charts = response;
                console.log(response);
            }, error => {
                console.log(error);
                console.log("System error API")
            });
    }
}