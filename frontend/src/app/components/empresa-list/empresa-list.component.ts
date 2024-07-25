import { Component, OnInit } from '@angular/core';
import { EmpresaService } from '../../services/empresa.service';
import { RouterModule } from '@angular/router';
import { EmpresaEditComponent } from '../empresa-edit/empresa-edit.component';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { MatDialogModule, MatDialog  } from '@angular/material/dialog';

@Component({
  selector: 'app-empresa-list',
  templateUrl: './empresa-list.component.html',
  imports: [CommonModule, FormsModule, MatDialogModule, RouterModule, NgbModule],
  standalone: true,
  styleUrls: ['./empresa-list.component.css']
})
export class EmpresaListComponent implements OnInit {
  empresas: any[] = [];

  constructor(private empresaService: EmpresaService, public dialog: MatDialog) { }

  ngOnInit(): void {
    this.empresaService.getEmpresas().subscribe(data => {
      this.empresas = data;
    });
  }

  editEmpresa(empresa: any): void {
    const dialogRef = this.dialog.open(EmpresaEditComponent, {
      width: '50%',
      height: '50%',
      data: empresa,
      panelClass: 'custom-dialog-container'
    });
  
    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        this.empresaService.updateEmpresa(result.id, result).subscribe(() => {
          // Atualizar a lista de sócios após a edição
          this.ngOnInit();
        });
      }
    });
  }
}
