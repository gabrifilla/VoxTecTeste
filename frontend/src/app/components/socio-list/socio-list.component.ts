import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { SocioService } from '../../services/socio.service';
import { SocioEditComponent } from '../socio-edit/socio-edit.component';
import { MatDialogModule, MatDialog  } from '@angular/material/dialog';
import { RouterModule } from '@angular/router';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-socio-list',
  templateUrl: './socio-list.component.html',
  styleUrls: ['./socio-list.component.css'],
  standalone: true,
  imports: [CommonModule, FormsModule, MatDialogModule, RouterModule, NgbModule]
})
export class SocioListComponent implements OnInit {

  socios: any[] = [];

  constructor(private socioService: SocioService, public dialog: MatDialog) { }

  ngOnInit(): void {
    this.socioService.getSocios().subscribe(data => {
      this.socios = data;
    });
  }

  editSocio(socio: any): void {
    const dialogRef = this.dialog.open(SocioEditComponent, {
      width: '50%',
      height: '50%',
      data: socio
    });
  
    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        // this.socioService.updateSocio(result).subscribe(() => {
        //   // Atualizar a lista de sócios após a edição
        //   this.ngOnInit();
        // });
      }
    });
  }
}
