/**
 * Created by cuong on 12/31/16.
 */
import { Component } from '@angular/core';

@Component({
    selector: 'u14',
    templateUrl: 'app/templates/u14.component.html'
})

export class u14Component {
    public title = 'This is u14';
    public today = new Date();
    public percentNumber = 1.6798;
    public e: number = 2.718281828459045;

    public object: Object = {foo: 'bar', baz: 'qux', nested: {xyz: 3, numbers: [1, 2, 3, 4, 5]}};

    public collection: string[] = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];
}