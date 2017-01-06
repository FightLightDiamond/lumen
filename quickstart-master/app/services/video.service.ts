/**
 * Created by e on 1/6/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';

@Injectable()

export class VideoService
{
    private baseUrl = 'http://127.0.0.1:8080/app/v1/';
    private searchWithSingerUrl = 'videos/search-with-singer';

    constructor(
        private _http: Http,
    ){}

    SearchWithSinger(): Observable<any[]>
    {
        return this._http.get(this.baseUrl + this.searchWithSingerUrl)
            .map(
                (response: Response) => response.json()
            );
    }

}