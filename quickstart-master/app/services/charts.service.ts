/**
 * Created by e on 1/4/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';

@Injectable()

export class ChartsService {

    private baseUrl = 'http://127.0.0.1:8080/app/v1/';
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
        var url = this.baseUrl + this.getAllWeekUrl;
        return this._http.get(url)
            .map(
                (res: Response) => res.json()
            );
    }

    CreateNewWeek(): Observable<any[]>
    {
        var url = this.baseUrl + this.createNewWeekUrl;
        return this._http.get(url)
            .map(
                (res: Response) => res.json()
            );
    }

    GetWeekAndType(week: number, type: number): Observable<any[]>
    {
        var url = this.baseUrl + this.getWeekAndType + week + '/' + type;
        return this._http.get(url)
            .map(
                (res: Response) => res.json()
            );
    }

    update(id:number, data: any): Observable<any[]>
    {
        var url = this.baseUrl + this.updateUrl + id;
        return this._http.put(url, data)
            .map(
                (res: Response) => res.json()
            );
    }
    GetActually(): Observable<any[]>
    {
        var url = this.baseUrl + this.getActuallyUrl;
        return this._http.get(url)
            .map(
                (res: Response) =>res.json()
            )
    }
    SetActive(data:any): Observable<any>
    {
        var url = this.baseUrl + this.activeUrl;
        return this._http.post(url, data)
            .map(
                (res: Response) => res.json()
            );
    }
}
