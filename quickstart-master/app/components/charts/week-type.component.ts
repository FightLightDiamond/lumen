/**
 * Created by e on 1/5/17.
 */
import { Component } from '@angular/core';
import { Subscription } from 'rxjs';
import { Router, ActivatedRoute } from '@angular/router';
import { ChartsService } from '../../services/charts.service';
import { SongService } from '../../services/songs.service';

@Component({
    selector: 'week-type-charts',
    templateUrl: 'app/templates/charts/week-type.component.html'
})

export class WeekTypeChartsComponent {
    public subscription: Subscription;
    public _week: number;
    public _type: number;
    public type: string;
    public types: any = { 1:'song', 2: 'video', 3: 'album'};
    public items: any[];
    public areas: any = { 1:'VN', 2: 'ASIA', 3: 'U.S.UK'};
    public area1: any[];
    public area2: any[];
    public area3: any[];
    public _id: number;
    public songs: any[];

    constructor(
        private route: Router,
        private activatedRoute: ActivatedRoute,
        private chartsService: ChartsService,
        private songService: SongService
    )
    {}
    ngOnInit()
    {
        this.subscription = this.activatedRoute
            .params
            .subscribe(
                params => {
                    this._week = params['week'];
                    this.type = this.types[params['type']];
                    this._type = params['type'];
                }
            );

        this.chartsService.GetWeekAndType(this._week, this._type)
            .subscribe(
                data => {
                    this.items = data;
                    this.area1 = data.slice(0,10);
                    this.area2 = data.slice(10,20);
                    this.area3 = data.slice(20,30);
                     console.log(this.area1);
                    // console.log(this.area2);
                    // console.log(this.area3);
                }
            );
    }
    getItemChart(id: number){
        this._id = id;
    }
    updateItemChart(id: number){
        this._id = id;
    }
    searchItem(e: any){

        if(e.which == 13){
            this.songService.SearchSongWithSinger()
                .subscribe(
                    data => {
                        this.songs = data['data'];
                        //console.log(data['data'])
                    }
                );
        }
    }
    onSubmit(form: any){
        console.log(this.id);
        console.log(form);
    }
}