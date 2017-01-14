/**
 * Created by cuong on 12/31/16.
 */
import { Component, Input, Output, EventEmitter } from  '@angular/core'

@Component({
    selector: 'u11',
    templateUrl: 'app/templates/u11.component.html',
})

export class u11Component {
    @Input() name: string;
    @Output() onVote = new EventEmitter<boolean>();

    public voted:boolean = false;

    vote(agree:boolean){
        this.voted = true;
        this.onVote.emit(agree)
    }

    setName(name:string) {
        this.name = name;
    }
}