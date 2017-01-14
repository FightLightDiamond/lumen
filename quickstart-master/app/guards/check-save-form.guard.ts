/**
 * Created by e on 1/10/17.
 */
import {Injectable} from "@angular/core";
import {CanDeactivate} from "@angular/router";
import {AllWeekChartsComponent} from "../components/charts/all-week.component";

@Injectable()

export class CheckSaveFormGuard implements CanDeactivate<AllWeekChartsComponent>
{
    canDeactivate(component: AllWeekChartsComponent): boolean {
        //console.log(component);
        //alert(component.pointDefault);
        //alert('You can not leave this page without saving data');
        return true;
    }
}