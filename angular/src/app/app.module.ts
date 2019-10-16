import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';


/*  MES IMPORTS  */

/*  COMPONENTS  */
import { InscriptionComponent } from './inscription/inscription.component';
import { FpasswordComponent } from './fpassword/fpassword.component';
import { Erreur404Component } from './erreur404/erreur404.component';
import { ConnexionComponent } from './connexion/connexion.component';
/* MODULES  */
import { NgxPaginationModule } from 'ngx-pagination';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
/*  SERVICES  */



@NgModule({
  declarations: [
    AppComponent,
    Erreur404Component,
    ConnexionComponent,
    InscriptionComponent,
    FpasswordComponent
  ],
  imports: [
    BrowserModule,
    RouterModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    NgxPaginationModule
  ],
  bootstrap: [AppComponent]
})


export class AppModule { }