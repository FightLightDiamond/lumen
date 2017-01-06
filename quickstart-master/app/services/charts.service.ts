/**
 * Created by e on 1/4/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';

@Injectable()

export class ChartsService {

    private rootUrl = 'http://127.0.0.1:8080/app/v1/';
    private getAllWeekUrl = 'charts/list-week/';
    private getWeekAndType = 'charts/items-by-week-and-type/';
    private createNewWeekUrl = 'charts/';
    private updateUrl = 'charts/';
    constructor(private _http: Http) {

    }

    GetAllWeek(): Observable<any[]> {
        var url = this.rootUrl + this.getAllWeekUrl;
        return this._http.get(url)
            .map(
                (response: Response) => response.json()
            );
    }

    CreateNewWeek(): Observable<any[]>
    {
        var url = this.rootUrl + this.createNewWeekUrl;
        return this._http.get(url)
            .map(
                (response: Response) => response.json()
            );
    }

    GetWeekAndType(week: number, type: number): Observable<any[]>
    {
        var url = this.rootUrl + this.getWeekAndType + week + '/' + type;
        return this._http.get(url).map(
            (response: Response) => response.json()
        );
    }

    update(id:number, data: any): Observable<any[]>
    {
        var url = this.rootUrl + this.updateUrl + id;
        return this._http.put(url, data).map(
            (response: Response) => response.json()
        );
    }
}
