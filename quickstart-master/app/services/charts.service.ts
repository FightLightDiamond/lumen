/**
 * Created by e on 1/4/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
/**
 * Config
 */
import { BASE_URL } from '../config/app.config';

@Injectable()

export class ChartsService {

    private getAllWeekUrl = 'charts/list-week/';
    private getWeekAndType = 'charts/items-by-week-and-type/';
    private createNewWeekUrl = 'charts/';
    private updateUrl = 'charts/';
    private getActuallyUrl = 'charts/actually';
    private activeUrl = 'charts/active';

    constructor(private _http: Http) {

    }

    GetAllWeek(): Observable<any[]>
    {
        var url = BASE_URL + this.getAllWeekUrl;
        return this._http.get(url)
            .map(
                (res: Response) => res.json()
            );
    }
    CreateNewWeek(): Observable<any[]>
    {
        var url = BASE_URL + this.createNewWeekUrl;
        return this._http.get(url)
            .map(
                (res: Response) => res.json()
            );
    }
    GetWeekAndType(week: number, type: number): Observable<any[]>
    {
        var url = BASE_URL + this.getWeekAndType + week + '/' + type;
        return this._http.get(url)
            .map(
                (res: Response) => res.json()
            );
    }
    update(id:number, data: any): Observable<any[]>
    {
        var url = BASE_URL + this.updateUrl + id;
        return this._http.put(url, data)
            .map(
                (res: Response) => res.json()
            );
    }
    GetActually(): Observable<any[]>
    {
        var url = BASE_URL + this.getActuallyUrl;
        return this._http.get(url)
            .map(
                (res: Response) =>res.json()
            )
    }
    SetActive(data:any): Observable<any>
    {
        var url = BASE_URL + this.activeUrl;
        return this._http.post(url, data)
            .map(
                (res: Response) => res.json()
            );
    }
}
