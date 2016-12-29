import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent }  from './app.component';

import { MaterialModule } from '@angular/material';
import 'hammerjs';

@NgModule({
  imports:      [ BrowserModule ],
  declarations: [ AppComponent ],
  bootstrap:    [ AppComponent ],

  imports: [MaterialModule.forRoot()],
})



export class AppModule { }

export class PizzaPartyAppModule { }