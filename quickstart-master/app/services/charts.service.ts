/**
 * Created by e on 1/4/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';

@Injectable()

export class ChartsService {

    private rootUrl = 'http://localhost:8080/app/v1/';
    private getAllWeekUrl = 'charts/list-week';
    private getSongByWeekAndType = 'charts/list-video-by-week-and-type/';
    private getVideoByWeekAndType = 'list-video-by-week-and-type/';

    constructor(private _http: Http) {

    }

    GetAllWeek(): Observable<any[]> {
        var url = this.rootUrl+this.getAllWeekUrl;
        return this._http.get(url)
            .map(
                (response: Response) => response.json()
            );
    }

    GetSongByWeekAndType(week_id:number, type:number): Observable<any[]> {
        var url = this.rootUrl+this.getSongByWeekAndType+week_id+'/'+type;
        return this._http.get(url).map(
            (response: Response) => response.json()
        );
    }

    GetVideoByWeekAndType(week_id:number, type:number): Observable<any[]> {
        var url = this.rootUrl+this.getVideoByWeekAndType+week_id+'/'+type;
        return this._http.get(url).map(
            (response: Response) => response.json()
        );
    }
}
