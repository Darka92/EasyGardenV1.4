import { Component, OnInit, OnDestroy } from '@angular/core';
import { PortailService } from 'src/app/services/portail.service';

@Component({
  selector: 'app-portail',
  templateUrl: './portail.component.html',
  styleUrls: ['./portail.component.css']
})

export class PortailComponent implements OnInit, OnDestroy {

  data;

  index: number;

  constructor(private portailService: PortailService) {

    /*console.log(this.data);*/

    this.data = this.portailService.portail;

  }

  ngOnInit() {
  }

  ngOnDestroy() {
  }

  getColor(statut) {
    if (statut === 'Ouvert') {
      return 'green';
    } else if (statut === 'Ferme') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === 'Ouvert') {
      this.portailService.switchOffOne(i);
    } else if (statut === 'Ferme') {
      this.portailService.switchOnOne(i);
    }
  }

}
