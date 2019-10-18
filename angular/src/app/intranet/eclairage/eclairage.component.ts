import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  ANGULAR  */
import { Router } from '@angular/router';

/*  SERVICES  */
import { EclairagesService } from 'src/app/services/eclairages.service';



@Component({
  selector: 'app-eclairage',
  templateUrl: './eclairage.component.html',
  styleUrls: ['./eclairage.component.css']
})



export class EclairageComponent implements OnInit, OnDestroy {

  eclairages = [];

  constructor(private eclairageService: EclairagesService, private router:Router) {}

  index: number;

  ngOnInit() {
    // Appeler méthode de service
    this.eclairages = this.eclairageService.eclairages;
    /*console.log(this.eclairages);*/
  }

  ngOnDestroy() {
  }

  getColor(statut: boolean) {
    if (statut === true) {
      return 'green';
    } else if (statut === false) {
      return 'red';
    }
  }

  onSwitch(i: number, statut: boolean) {
    if (statut === true) {
      this.eclairageService.switchOffOne(i);
    } else if (statut === false) {
      this.eclairageService.switchOnOne(i);
    }
  }
  

}


/* 
  onSwitch(i: number, statut: boolean, capteurDefautAmpoule: boolean) {
    if (capteurDefautAmpoule === true) {
      alert('L\'ampoule de cet éclairage est hors-service!');
      return;
    }
    if (statut === true) {
      this.eclairageService.switchOffOne(i);
    } else if (statut === false) {
      this.eclairageService.switchOnOne(i);
    }
  }
   */