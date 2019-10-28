import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';


/*  MES IMPORTS  */
/*  COMPONENT  */
import { AccueilComponent } from './accueil/accueil.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { ArrosageComponent } from './arrosage/arrosage.component';
import { BassinComponent } from './bassin/bassin.component';
import { TondeuseComponent } from './tondeuse/tondeuse.component';
import { PortailComponent } from './portail/portail.component';
import { ImgaccComponent } from './imgacc/imgacc.component';
import { EclairageComponent } from './eclairage/eclairage.component';
import { ProfilComponent } from './profil/profil.component';
import { AddEquipementComponent } from './add-equipement/add-equipement.component';
import { UpdateEquipementComponent } from './update-equipement/update-equipement.component';

/*  MODULES  */
import { IntranetRoutingModule } from './intranet-routing.module';
import { NgxPaginationModule } from "ngx-pagination";

/*  SERVICES  */
import { ArrosagesService } from '../services/arrosages.service';
import { EclairagesService } from '../services/eclairages.service';
import { BassinsService } from '../services/bassins.service';
import { TondeusesService } from '../services/tondeuses.service';
import { PortailsService } from '../services/portails.service';



@NgModule({
  declarations: [AccueilComponent,
    NavComponent, 
    FooterComponent, 
    ArrosageComponent, 
    BassinComponent, 
    TondeuseComponent, 
    PortailComponent,
    ImgaccComponent, 
    EclairageComponent, 
    ProfilComponent, 
    AddEquipementComponent, 
    UpdateEquipementComponent],
  imports: [
    CommonModule,
    IntranetRoutingModule,
    NgxPaginationModule
  ],
  providers: [
    ArrosagesService,
    EclairagesService,
    BassinsService,
    TondeusesService,
    PortailsService
  ]
})


export class IntranetModule { }
