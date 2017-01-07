/**
 * Created by e on 1/4/17.
 */
import { Component } from '@angular/core';
import { ChartsService } from '../../services/charts.service';


import { Subscription } from 'rxjs';
import { SongService } from '../../services/songs.service';
import { VideoService } from '../../services/video.service';
import { AlbumService } from '../../services/album.service';

@Component({
    selector: 'all-week-chart',
    templateUrl: 'app/templates/charts/all-week-chart.component.html',
    styleUrls : [
        'app/styles/validate.css'
    ],
    providers: [ChartsService, SongService, VideoService, AlbumService],
})

export class AllWeekChartsComponent{
    public areaNames: any = { 0:'VN', 1: 'ASIA', 2: 'U.S.UK'};
    public typeNames: any = { 0:'Song', 1: 'Video', 2: 'Album'};
    public weeks : any[];
    public charts: any[][];

   // public subscription: Subscription;
    public _week: number;
    public typeNo: number;
    public items: any[];
    public itemRemember:number;
    public active: boolean = false;
    public disabled: any;
    public areaNo: number;
    public rankNo: number;
    public chartsId: number;

    constructor(
        private chartsService: ChartsService,
        private songService: SongService,
        private videoService: VideoService,
        private albumService: AlbumService

    ){}

    ngOnInit(){
        this.chartsService.GetAllWeek()
            .subscribe(
                (res: any) => {
                    this.weeks = res;
                },
                error => {
                    console.log(error);
                    console.log("API get all week error!")
                }
            );
        this.chartsService.GetActually()
            .subscribe(
                (res: any) => {
                    this.buildCharts(res);
                    console.log(this.charts);
                },
                error => {
                    console.log(error);
                    console.log("API get actually error");
                }
            );
    }
    private buildCharts(res: any[][]){
        this.charts = [[], [], []];
        var index = 0;
        var numberItem = 10;
        for(var i = 1; i <= 9; i++)
        {
            this.charts[index].push(
                res.slice(i*numberItem - numberItem, i*numberItem)
            );
            if(i%3 == 0)
            {
                ++index;
            }
        }
    }

    ngOnCreate(){
        var ok = confirm('You want to create new week ?');
        if(ok){
            this.chartsService.CreateNewWeek().subscribe(
                (res: any) => {
                    if(res === true){
                        var maxWeek = this.weeks[0];
                        this.weeks.unshift(++maxWeek);
                    }
                }
            );

        }
    }
    /*
        Process
     */
    private resetItems(){
        this.items = [];
    }

    getItemChart(chartsId: number, rankNo: number){
        this.chartsId = chartsId;
        this.rankNo = rankNo;
    }
    selectedItemChart(typeNo: number, areaNo: number, rankNo: number, chartsId: number){
        if(this.typeNo != typeNo)
        {
            this.resetItems();
            this.typeNo = typeNo;
        }
        this.areaNo = areaNo;
        this.rankNo = rankNo;
        this.chartsId = chartsId;
    }
    updateChart(formData: any){
        this.chartsService.update(this.chartsId, formData)
            .subscribe(
                data => {
                    if(data){
                        this.charts[this.areaNo][this.typeNo][this.rankNo].item = this.itemRemember;
                        this.charts[this.areaNo][this.typeNo][this.rankNo].item_id = this.itemRemember;
                    }else{
                        this.error();
                    }
                }
            )
    }
    private hiddenItemLinks: boolean = true;
    private showPreviousItemLinks: boolean = false;
    private showNextItemLinks: boolean = false;
    private currentPageItemLinks: number = 1;
    searchItem(formData: any, numPage: number = 1){
        var params: string = '?name=' + formData.itemName + '& singer_name=' + formData.singerName + '&page='+numPage;
        if(this.typeNo == 0){
            this.songService.SearchWithSinger(params)
                .subscribe(
                    data => {
                        this.items = data['data'];
                        this.setItemLinks(data);
                    }
                );
        }
        else if(this.typeNo == 1){
            this.videoService.SearchWithSinger(params)
                .subscribe(
                    data => {
                        this.items = data['data'];
                        this.setItemLinks(data);
                    }
                );
        }
        else if(this.typeNo == 2){
            this.albumService.SearchWithSinger(params)
                .subscribe(
                    data => {
                        this.items = data['data'];
                        this.setItemLinks(data);
                    }
                );
        }
        else {
            this.error();
        }
    }
    private setItemLinks(data)
    {
        if(data.to === 10) {
            this.showNextItemLinks = true;
        } else {
            this.showNextItemLinks = false;
        }

        if(data.to < 10 && data.current_page === 1) {
            this.hiddenItemLinks = true;
        } else {
            this.hiddenItemLinks = false;
        }
        // alert(data.to);
        // alert(this.showNextItemLinks)

        if(data.current_page === 1){
            this.showPreviousItemLinks = false;
        } else {
            this.showPreviousItemLinks = true;
        }
        this.currentPageItemLinks = data.current_page;
    }

    rememberSelectedItem(itemRemember: number){
        this.itemRemember = itemRemember;
    }
    setActive(active: boolean){
        var sure: boolean = confirm('You sure set active?');
        if(sure)
        {
            var data: any = { week: this.weeks[0], is_active: active };
            this.chartsService.SetActive(data)
                .subscribe(
                    data => {
                        if(data){
                            this.active = active;
                        }
                    }
                );
        }
    }

    error(){
        alert('Hệ thống đang bị Hacker tấn công vui lòng thông báo kỹ thuật viên');
    }


}