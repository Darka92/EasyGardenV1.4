import { Component, OnInit } from '@angular/core';


/*  MES IMPORTS  */
/*  SERVICES  */
import { ArrosagesService } from 'src/app/services/arrosages.service';
/*  ROUTES  */
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';  /*  Nécessaire pour la fonction goBack()  */
/* Models */
import { Arrosage } from 'src/app/intranet/models/arrosage';   /*  Nécessaire pour arrosage: Arrosage[]; check si l'objet reçu correspond au modèle de données  */



@Component({
  selector: 'app-update-equipement',
  templateUrl: './update-equipement.component.html',
  styleUrls: ['./update-equipement.component.css']
})



export class UpdateEquipementComponent implements OnInit {

  /*arrosage: Arrosage[];*/
  arrosage = {};

  constructor(private arrosageService: ArrosagesService, private router: Router, private location: Location, private route: ActivatedRoute) {}

  arrosageId: number;

  ngOnInit() {
    this.arrosageId =+ this.route.snapshot.params['id'];
    this.arrosage = this.arrosageService.getArrosage(this.arrosageId);
    /*console.log(this.arrosageId);*/
    /*console.log(this.arrosage);*/
  }

  onSubmit(evt) {
    evt.preventDefault();
    this.arrosageService.updateArrosageApi(this.arrosageId);
  }
  
  goBack() {
    this.location.back();
  }


}
