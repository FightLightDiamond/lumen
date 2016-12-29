/**
 * Created by e on 12/29/16.
 */
import {platformBrowserDynamic} from '@angular/platform-browser-dynamic';
import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {FormsModule} from '@angular/forms';
import {MaterialModule} from '@angular/material';
import {InputFormExample} from './input-form-example';

@NgModule({

    imports: [
        BrowserModule,
        FormsModule,
        MaterialModule.forRoot(),
    ],

    declarations: [InputFormExample],
    bootstrap: [InputFormExample],
    providers: []
})
export class PlunkerAppModule {}

platformBrowserDynamic().bootstrapModule(PlunkerAppModule);