/**
 * Created by e on 1/5/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';

@Injectable()

export class SongService
{
    private rootUrl = 'http://127.0.0.1:8080/app/v1/';
    private searchSongWithSingerUrl = 'songs/search-with-singer';

    constructor(private _http: Http)
    {

    }

    SearchSongWithSinger(): Observable<any[]>
    {
        var url = this.rootUrl + this.searchSongWithSingerUrl;
        return this._http.get(url)
            .map(
                (response: Response) => response.json()
            )
    }
}