import { Component, OnInit } from '@angular/core';


/*  MES IMPORTS  */
/*  SERVICES  */
import { ArrosagesService } from 'src/app/services/arrosages.service';
/*  ROUTES  */
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';  /*  Nécessaire pour la fonction goBack()  */



@Component({
  selector: 'app-add-equipement',
  templateUrl: './add-equipement.component.html',
  styleUrls: ['./add-equipement.component.css']
})



export class AddEquipementComponent implements OnInit {

  arrosages = [];

  constructor(private arrosageService: ArrosagesService, private router: Router, private location: Location, private route: ActivatedRoute) {}

  ngOnInit() {
  }

  onSave() {
    this.arrosageService.addArrosageApi();
    /*console.log(this.arrosages);*/
  }

  goBack() {
    this.location.back();
  }


}